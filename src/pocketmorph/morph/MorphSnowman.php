<?php
namespace pocketmorph\morph;

use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;

class MorphSnowman extends Morph implements MorphEntity
{

    const NETWORK_ID = 21;

    public function getName(): string
    {
        return "Snowman";
    }

    public function spawnTo(Player $player): void
    {

        $pk = new AddEntityPacket();
        $pk->eid = $this->getId();
        $pk->type = self::NETWORK_ID;
        $pk->x = $this->x;
        $pk->y = $this->y;
        $pk->z = $this->z;
        $pk->yaw = $this->yaw;
        $pk->pitch = $this->pitch;
        $pk->metadata = [
            3 => [0, $this->getDataProperty(3)],
            15 => [0, 1]
        ];   
		$player->dataPacket($pk);
        parent::spawnTo($player);
    }


}
