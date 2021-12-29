<?php

namespace Aro;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("[sv] §cĐã hoạt động!");
	}
	
	public function onDisable(){
		$this->getLogger()->info("[sv] Đã dừng!");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "helps":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §aHướng Dẫn Cách Chơi§e |§c♦§e|§a=-");
			   $sender->sendMessage("§a∘ §bĐi thẳng đến ngôi nhà §blà nơi bạn chọn Server mình muốn");
			   $sender->sendMessage("§a∘ §dĐể vào nhanh, nhấn vào NPC bạn muốn chơi");
			   $sender->sendMessage("§a∘ §aChúc bạn chơi vui vẻ");
			   $sender->sendMessage("§e-------------------------");
			   return true;
			case "law":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dQuy Định - Luật Chơi - server§e |§c♦§e|§a=-");
			   $sender->sendMessage("§c♦ §aKhông sử dụng các phần mềm cheat Hack...");
			   $sender->sendMessage("§c♦ §aKhông nói tục chửi thề hay gây War...");
			   $sender->sendMessage("§c♦ §aCác trường hợp khác tuỳ mức độ và hành vi. Chúng tôi sẽ xử lí sau.");
			   $sender->sendMessage("§c♦ §aKhông quảng cáo, Spam Chat trên khung chat server.");
			   $sender->sendMessage("§c♦ §aKhông tự ý giao dịch để tránh bị lừa dảo trong server.");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;			
			case "lag":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dCách Giảm Lagg§e |§c♦§e|§a=-");
			   $sender->sendMessage("§eCách 1:§b Vào Settings->Video-> Tắt View Bobbing, Fancy Graphics, Beautiful Skies");
			   $sender->sendMessage("§eCách 2:§b Vào Settings->Video-> Bật Show Advanced...phần Render Distance kéo xuống 4 Chunks");
			  // $sender->sendMessage("§eCách 3:§b ");
			   $sender->sendMessage("§dNếu bạn còn cách nào hay hơn hãy chia sẻ ngay bằng cách §f/idea <tên> <note>");
			   return true;
			case "info":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dGiới Thiệu Thông Tin - server§e |§c♦§e|§a=-");
			   $sender->sendMessage("§7∘ §bChào mừng đến với server ");
			   $sender->sendMessage("§7∘ §aMinecraft là game sáng tạo trong thế giới ảo, xây dựng trở thành vua của thế giới");
			   $sender->sendMessage("§7∘ §bChắc hẳn ở Việt Nam rất nhiều máy chủ hay mạnh và tối ưu hơn server");
			   $sender->sendMessage("§7∘ §aserver thành lập ngày §b31/01/2018 §avà cũng là ngày mở cửa chính thức");
			   $sender->sendMessage("§7∘ §aservercũng là một máy chủ mới nhưng nhiều kinh nghiệm");
			   $sender->sendMessage("§7∘ §aserver có các chế độ chơi đa dạng đáp ứng nhu cầu của các bạn");
			   $sender->sendMessage("§7∘ §eHệ thống cũng đã việt hóa phần nào để tiện cho người chơi");
			   $sender->sendMessage("§7∘ §6Survival – Sinh Tồn");
               $sender->sendMessage("§7∘ §6MiniGames – Trò chơi giải trí");
			   $sender->sendMessage("§7∘ §6Skyblock – AcidIsland – Đảo trên trời");
			   $sender->sendMessage("§7∘ §6PvP Arena – Cuộc chiến Khô Máu");
			   $sender->sendMessage("§7∘ §bMột phần nhỏ các chế độ chơi của server");
			   $sender->sendMessage("§7∘ §aserver cần sự ủng hộ của các bạn, đó là động lực giúp server phát triển hơn");
			   $sender->sendMessage("§7∘ §aChúc các bạn có 1 ngày chơi vui vẻ!");
			   return true;
			case "tocao":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dTố Cáo - Báo Lỗi§e |§c♦§e|§a=-");
			   $sender->sendMessage("§c∘ §eSử dụng lệnh §a/baoloi <tên> <lỗi cần báo>");
			   $sender->sendMessage("§c∘ §aRất cảm ơn sự quan tâm của bạn");
			  // $sender->sendMessage("");
			  // $sender->sendMessage("");
			   return true;
			case "thongbao":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dThông Báo - Tuyển Dụng§e |§c♦§e|§a=-");
			   $sender->sendMessage("§d► Helper Team");
			   $sender->sendMessage("§r- Yêu cầu các bạn bắt buộc phải am hiểu về Minecraft và server ");
			   $sender->sendMessage("§r- Thời gian online tổi thiểu 2-3 giờ/1 ngày");
			   $sender->sendMessage("§r- Nhiệt tình trả lời và trợ giúp các new member");
			   $sender->sendMessage("§1► Police Team");
			   $sender->sendMessage("§r- Yêu cầu các bạn phải có kĩ năng phân biệt và phát hiện hack cheat");
			   $sender->sendMessage("§r- Thời gian online tối thiểu 3-5 giờ/1 ngày");
			   $sender->sendMessage("§r- Có sức nhẫn nhịn chịu đựng áp lực trước trẻ em, biết cư xử đúng mực");
			   $sender->sendMessage("§r- Không lạm quyền bừa bãi, xử phạt theo tư cách cá nhân");
			   $sender->sendMessage("§b-> Liên hệ tại Group:Royal Eagle §bđể đăng ký công việc");
			   return true;
			case "allsv":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §eCác Server đang hoạt động §e |§c♦§e|§a=-");
		$sender->sendMessage("§f> §bFactions: Pe.sv.com 19131");
		$sender->sendMessage("§f> §bSurvival: Pe.sv.com 1913");
		$sender->sendMessage("§f> §bSkyBlock: Pe.sv.com 1913");
		$sender->sendMessage("§f> §bPrison: Pe.sv.com 1913");
		$sender->sendMessage("§f> §bLobby: Pe.sv.com 1913");
		$sender->sendMessage("§f> §b: Pe.sv.com 1913");
			   return true;
			   default:
			   return false;
		}
	}
}