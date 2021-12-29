<?php
namespace D2P;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	public function onEnable(){
		@mkdir($this->getDataFolder());
		
		if(!file_exists($this->getDataFolder() . "config.yml")){
			file_put_contents($this->getDataFolder() . "config.yml",yaml_emit(array()));
		}
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
				// tạo ra file config
				"Luật 1 cho member" => "Luật của bạn",
				"Luật 2 cho member" => "Luật của bạn",				
				"Luật 3 cho member" => "Luật của bạn",				
				"Luật 4 cho member" => "Luật của bạn",
				"Luật 5 cho member" => "Luật của bạn",
				"Luật 6 cho staff" => "Luật của bạn",
				"Luật 7 cho staff" => "Luật của bạn",				
				"Luật 8 cho staff" => "Luật của bạn",				
				"Luật 9 cho staff" => "Luật của bạn",
				"Luật 10 cho staff" => "Luật của bạn",
		]);
		$this->getLogger()->info(TextFormat::GREEN ."Khởi chạy plugin");
    }	    	
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "luat": // lệnh
			case "rules": // lệnh	
			    $sender->sendMessage(TextFormat::GREEN ."§e----§b Luật chung §e----");
				$sender->sendMessage($this->config->get("Luật 1 cho member"));
				$sender->sendMessage($this->config->get("Luật 2 cho member"));
				$sender->sendMessage($this->config->get("Luật 3 cho member"));
				$sender->sendMessage($this->config->get("Luật 4 cho member"));
				$sender->sendMessage($this->config->get("Luật 5 cho member"));
				$sender->sendMessage(TextFormat::GREEN ."§e----§b Luât dành Cho staff §e----");
				$sender->sendMessage($this->config->get("Luật 6 cho staff"));
				$sender->sendMessage($this->config->get("Luật 7 cho staff"));
				$sender->sendMessage($this->config->get("Luật 8 cho staff"));
				$sender->sendMessage($this->config->get("Luật 9 cho staff"));
				$sender->sendMessage($this->config->get("Luật 10 cho staff"));
				return true;
	}
}
  }