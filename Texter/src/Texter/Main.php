<?php

namespace Texter;

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\utils\TextFormat as Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\particle\Particle;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\Position\getLevel;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\math\Vector3;
use pocketmine\utils\config;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	$this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(Color::GREEN ."Enabled!");
    }
    
    public function onDisable(){
    	$this->getLogger()->info(Color::RED ."Disabled");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if($cmd->getName() == "mypos"or"mp"){
        $x = $sender->x;
        $y = $sender->y;
        $z = $sender->z;
        	$xs = sprintf('%0.1f', $x);
        	$ys = sprintf('%0.1f', $y);
        	$zs = sprintf('%0.1f', $z);
        $sender->sendMessage(Color::YELLOW . "Your POS is:\n" . "X is: " . Color::GREEN . $xs . Color::YELLOW . "\nY is: " . Color::GREEN . $ys . Color::YELLOW . "\nZ is: " . Color::GREEN . $zs . Color::YELLOW . "\nPlugins\Texter\Config.ymlからこの値を記入して下さい");
        }
    }
   public function onJoin(PlayerJoinEvent $event){
       $player = $event->getPlayer();
       $level = $player->getLevel();
       $config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);

       $x1 = $config->get("X1");
       $y1 = $config->get("Y1");
       $z1 = $config->get("Z1");
       $text1 = str_replace("&", "§", $config->get("TEXT1"));
       $title1 = str_replace("&", "§", $config->get("TITLE1"));
       $particle = new FloatingTextParticle(new Vector3($x1, $y1, $z1), $text1, $title1);
       $level->addParticle($particle);

       $x2 = $config->get("X2");
       $y2 = $config->get("Y2");
       $z2 = $config->get("Z2");
       $text2 = str_replace("&", "§", $config->get("TEXT2")); 
       $title2 = str_replace("&", "§", $config->get("TITLE2")); 
       $particle2 = new FloatingTextParticle(new Vector3($x2, $y2, $z2), $text2, $title2);
       $level->addParticle($particle2);

       $x3 = $config->get("X3");
       $y3 = $config->get("Y3");
       $z3 = $config->get("Z3");
       $text3 = str_replace("&", "§", $config->get("TEXT3")); 
       $title3 = str_replace("&", "§", $config->get("TITLE3")); 
       $particle3 = new FloatingTextParticle(new Vector3($x3, $y3, $z3), $text3, $title3);
       $level->addParticle($particle3);

   }
   
   public function onRespawn(PlayerRespawnEvent $event){
       $player = $event->getPlayer();
       $level = $player->getLevel();
       $config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
       
       $x1 = $config->get("X1");
       $y1 = $config->get("Y1");
       $z1 = $config->get("Z1");
       $text1 = $config->get("TEXT1");
       $title1 = $config->get("TITLE1");
       $particle = new FloatingTextParticle(new Vector3($x1, $y1, $z1), $text1, $title1);
       $level->addParticle($particle);

       $x2 = $config->get("X2");
       $y2 = $config->get("Y2");
       $z2 = $config->get("Z2");
       $text2 = $config->get("TEXT2");
       $title2 = $config->get("TITLE2");
       $particle2 = new FloatingTextParticle(new Vector3($x2, $y2, $z2), $text2, $title2);
       $level->addParticle($particle2);

       $x3 = $config->get("X3");
       $y3 = $config->get("Y3");
       $z3 = $config->get("Z3");
       $text3 = $config->get("TEXT3");
       $title3 = $config->get("TITLE3");
       $particle3 = new FloatingTextParticle(new Vector3($x3, $y3, $z3), $text3, $title3);
       $level->addParticle($particle3);

   }
}
