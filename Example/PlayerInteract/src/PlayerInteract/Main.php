<?php

namespace PlayerInteract;

# Base
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

# Event
use pocketmine\event\player\PlayerInteractEvent;

# Other
use pocketmine\math\Vector3;
use pocketmine\block\Block;

class Main extends PluginBase implements Listener{

	// 起動時に実行されるコード
	public function onEnable(){
		// これを行うことで、Eventの機能を使用できる。(例: PlayerInteractEvent)
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	// プレイヤーが何か触ったら実行されるコード
	// ※空気ブロックも触った判定になります
	public function PlayerInteractEvent(PlayerInteractEvent $event){
		//  手に持っているアイテムを取得 -->アイテムIDを取得
		$item = $event->getItem()->getId();

		// 触ったブロックを取得
		$block = $event->getBlock();

		// 触ったブロックIDを取得
		$id = $block->getId();

		// 触ったブロックのダメージ値(メタ値?)を取得
		$meta = $block->getDamage();

		// 触ったブロックの座標を取得
		// (int) と書くことで、数値を整数にしてくれる(文字の場合は"0")
		// 追記: intだからって、四捨五入ではないらしい...
		$x = (int) $block->x;
		$y = (int) $block->y;
		$z = (int) $block->z;

		// if文の内容
		//   手に持っているアイテムIDが"267"(鉄の剣)だったら
		//   AND 触ったブロックIDが"17"(原木)だったら
		//   AND 触ったブロックのダメージ値(メタ値?)が"0"(今回はオークの原木)だったら

		// if文の記号の説明
		//   && = AND
		//   || = OR
		if($item == 267 && $id == 17 && $meta == 0){
			// プレイヤーを取得 --> "プレイヤーが居る"ワールドを取得
			$level = $event->getPlayer()->getLevel();

			// 座標の定義(?) Vector3に入れないとダメなのよ
			// そして、土は一つ上の座標へ置くので"+1"
			// 「new Vecotor3」を使うので「use pocketmine\math\Vector3;」が要ります
			$pos_1 = new Vector3($x, $y, $z);
			$pos_2 = new Vector3($x, $y + 1, $z);

			// ブロックを指定(今回は「石」と「草付き土」)
			// 「new Block」を使うので「use pocketmine\block\Block;」が要ります
			$block_1 = new Block(1);
			$block_2 = new Block(2);

			// ワールドにブロックを置く
			$level->setBlock($pos_1, $block_1); // 石
			$level->setBlock($pos_2, $block_2); // 草付き土

			// 補足
			//   既にブロックあったら上書きされるので。
			//   厳密には「空気ブロックがある」が正しい気がした。
		}
	}

}