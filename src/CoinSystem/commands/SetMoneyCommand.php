<?php


namespace CoinSystem\commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

class SetMoneyCommand extends Command {

    public function __construct() {

        parent::__construct("setcoins",
            "SetCoins",
            "/setcoins [Spieler] [Anzahl]");

    }

    /**
     * @inheritDoc
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {

        $name = $sender->getName();

        if($sender->hasPermission("setcoins")) {

            $playerdata = new Config("/home/Spieler/Coins/" . $name . ".yml", Config::YAML);

            if(!isset($args[0])) {

                $sender->sendMessage("/setcoins [Spieler] [Anzahl]");

            } else if($target_player = $sender->getServer()->getPlayer($args[0])) {

                if(isset($args[1])) {

                    $playerdata = new Config("/home/Spieler/Coins/" . $target_player->getName() . ".yml", Config::YAML);
                    $playerdata->set("coins", $args[1]);
                    $playerdata->save();

                    $sender->sendMessage("§6Coins §7|§a Du hast das Guthaben von §6" . $target_player->getName() . "§a erfolgreich geändert§7!");
                    $target_player->sendMessage("§6Coins §7|§a Dein Guthaben wurde erfolgreich auf§6 " . $args[1] . "§a Coins(s) gestetzt");

                }

            }

        } else {

            $sender->sendMessage("§6Coins §7|§c Du hast nicht die Rechte dazu§7!");

        }

    }
}