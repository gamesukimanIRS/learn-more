<?php

namespace PlaySound;

# Base
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

# Event
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;

# Sound
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\PopSound;

# Other
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->sound = 1;
		$this->pitch = -20;
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function PlayerJoinEvent(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$player->sendMessage("§eブロック叩いて再生。");
		$player->sendMessage("§e空中を長押しで、サウンド変更。");
		$player->sendMessage("§eなお、再生するごとにピッチ上がるよ。");
	}

	public function PlayerInteractEvent(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		if($event->getBlock()->getId() !== 0){
			$pos = new Vector3($player->x, $player->y, $player->z);
			$pitch = $this->pitch;
			if($this->pitch !== 20){
				++$this->pitch;
			}else{
				$this->pitch = -20;
			}
			switch ($this->sound) {
				case 1:
					$player->getLevel()->addSound(new BatSound($pos, $pitch));
					$player->sendMessage("§7BatSound (pitch: ".$pitch.")");
					break;

				case 2:
					$player->getLevel()->addSound(new ClickSound($pos, $pitch));
					$player->sendMessage("§7ClickSound (pitch: ".$pitch.")");
					break;

				case 3:
					$player->getLevel()->addSound(new DoorSound($pos, $pitch));
					$player->sendMessage("§7DoorSound (pitch: ".$pitch.")");
					break;

				case 4:
					$player->getLevel()->addSound(new FizzSound($pos, $pitch));
					$player->sendMessage("§7FizzSound (pitch: ".$pitch.")");
					break;

				case 5:
					$player->getLevel()->addSound(new LaunchSound($pos, $pitch));
					$player->sendMessage("§7LaunchSound (pitch: ".$pitch.")");
					break;

				case 6:
					$player->getLevel()->addSound(new PopSound($pos, $pitch));
					$player->sendMessage("§7PopSound (pitch: ".$pitch.")");
					break;
			}
		}else{
			if($this->sound !== 6){
				++$this->sound;
			}else{
				$this->sound = 1;
			}
			$player->sendMessage("§7サウンド変更: ".$this->sound);
		}
	}

}