<?php

namespace Example;

# Base
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

# Other
use pocketmine\scheduler\PluginTask;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		// 最後の数値はtickごとに指定可。20なら20tick(1秒)ごとに動作。
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new tick($this), 1);
	}

	public function tick(){
		// code...
	}

}

class tick extends PluginTask{
	public function onRun($tick){
		$this->getOwner()->tick();
	}
}
