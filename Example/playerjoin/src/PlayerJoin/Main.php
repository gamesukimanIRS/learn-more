<?php

namespace PlayerJoin;

# Base
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

# Event
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{

	// 起動時に実行されるコード
	public function onEnable(){
		// これを行うことで、Eventの機能を使用できる。(例: PlayerJoinEvent)
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	// プレイヤーがゲームに参加したら実行されるコード
	public function PlayerJoinEvent(PlayerJoinEvent $event){
		// $event関数から、プレイヤーの情報(Player Object)を取得。
		$player = $event->getPlayer();

		// $player関数から、プレイヤーの名前を取得。
		$name = $player->getName();

		// $player関数を使って、プレイヤーにメッセージを送信。
		// 表示例: mfmfnekoさん、サーバーへようこそ！
		$player->sendMessage($name."さん、サーバーへようこそ！");
	}

}