<?php
namespace EssentialsPE\Commands\Warp;

use EssentialsPE\BaseFiles\BaseAPI;
use EssentialsPE\BaseFiles\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Warp extends BaseCommand{
    /**
     * @param BaseAPI $api
     */
    public function __construct(BaseAPI $api){
        parent::__construct($api, "warp", "Teleport to a warp", "[[name] [player]]", true, ["warps"]);
        $this->setPermission("essentials.warp.use");
    }

    /**
     * @param CommandSender $sender
     * @param string $alias
     * @param array $args
     * @return bool
     */
    public function execute(CommandSender $sender, $alias, array $args): bool{
        if(!$this->testPermission($sender)){
            return false;
        }
        if(count($args) === 0){
            if(($list = $this->getAPI()->warpList(false)) === false){
                $sender->sendMessage(TextFormat::AQUA . "There are no Warps currently available");
                return false;
            }
            $sender->sendMessage(TextFormat::AQUA . "Available warps:\n" . $list);
            return true;
        }
        if(!($warp = $this->getAPI()->getWarp($args[0]))){
            $sender->sendMessage(TextFormat::RED . "[Error] Warp doesn't exist");
            return false;
        }
        if(!isset($args[1]) && !$sender instanceof Player){
            $this->sendUsage($sender, $alias);
            return false;
        }
        $player = $sender;
        if(isset($args[1])){
            if(!$sender->hasPermission("essentials.warp.other")){
                $sender->sendMessage(TextFormat::RED . "➡✡Lỗi✡bạn không thể tới warp đó");
                return false;
            }elseif(!($player = $this->getAPI()->getPlayer($args[0]))){
                $sender->sendMessage(TextFormat::RED . "➡✡Lỗi✡warp ko có");
                return false;
            }
        }
        if(!$sender->hasPermission("essentials.warps.*") && !$sender->hasPermission("essentials.warps.$args[0]")){
            $sender->sendMessage(TextFormat::RED . "➡✡bạn không thể đi đến warp đó");
            return false;
        }
        $player->teleport($warp);
        $player->sendMessage(TextFormat::GREEN . "✔đang đến warp✔ " . TextFormat::AQUA . $warp->getName() . TextFormat::GREEN . "...");
        if($player !== $sender){
            $sender->sendMessage(TextFormat::GREEN . "✔đã đến warp✔" . TextFormat::YELLOW . $player->getDisplayName() . TextFormat::GREEN . " to " . TextFormat::AQUA . $warp->getName() . TextFormat::GREEN . "...");
        }
        return true;
    }
} 
