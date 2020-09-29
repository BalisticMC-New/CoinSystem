<?php


namespace CoinSystem\listener;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class PlayerJoinListener implements Listener {

    public function onJoin(PlayerJoinEvent $event) {

        $player = $event->getPlayer();
        $name = $player->getName();
        $cfg = new Config("/home/Spieler/Coins/" . $name . ".yml", Config::YAML);

        if(!$cfg->exists("coins")) {


            $cfg->set('coins', 500);
            $cfg->save();

        }

    }

}