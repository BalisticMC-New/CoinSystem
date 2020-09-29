<?php


namespace CoinSystem\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

class MoneyCommand extends Command {

    public function __construct() {

        parent::__construct("coins",
            "coins",
            "/coins");

    }

    /**
     * @inheritDoc
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {

        $name = $sender->getName();
        $playerdata = new Config("/home/Spieler/Coins/" . $name . ".yml", Config::YAML);

        if(isset($args[0])) {

            if($target_player = $sender->getServer()->getPlayer($args[0])) {

                $targetdata = new Config("/home/Spieler/Coins/" . $target_player->getName() . ".yml", Config::YAML);

                $sender->sendMessage("§eDas Guthaben von §6 " . $target_player->getName() . " §7 |§6 " . $targetdata->get("coins"));

            } else {

                $sender->sendMessage("§6Coins §7|§c Dieser Spieler ist grade nicht online§7!");

            }

        } else {

            $sender->sendMessage("§6Coins§7 |§6 " . $playerdata->get("coins"));

        }

    }
}