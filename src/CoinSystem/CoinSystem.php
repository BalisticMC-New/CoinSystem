<?php

namespace CoinSystem;

use CoinSystem\commands\MoneyCommand;
use CoinSystem\commands\SetMoneyCommand;
use CoinSystem\listener\PlayerJoinListener;
use pocketmine\plugin\PluginBase;

class CoinSystem extends PluginBase {

    public $prefix = "§6Coins §7|§f ";

    public function onEnable() {

        $this->registerCmd();
        $this->registerEvent();

        $this->getLogger()->info($this->prefix . "§aDas Plugin ist nun Aktiviert");

    }

    public function onDisable() {

        $this->getLogger()->info($this->prefix . "§aDas Plugin ist nun Deaktiviert");

    }

    private function registerCmd() {

        $cmdMap = $this->getServer()->getCommandMap();
        $cmdMap->register("mymoney", new MoneyCommand());
        $cmdMap->register("setmoney", new SetMoneyCommand());

    }

    private function registerEvent() {

        $pm = $this->getServer()->getPluginManager();
        $pm->registerEvents(new PlayerJoinListener(), $this);

    }

}