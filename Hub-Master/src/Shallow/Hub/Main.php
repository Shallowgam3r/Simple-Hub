<?php

declare(strict_types=1);

namespace Shallow\Hub;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{


    public function onEnable()
    {

        $this->getLogger()->info("ShallowHub Enabled!");

        @mkdir($this->getDataFolder());

        $this->saveDefaultConfig();

        $this->cfg = $this->getConfig();
    }
    public function onJoin(PlayerJoinEvent $playerJoinEvent){

        $player = $playerJoinEvent->getPlayer();

        $prefix = $this->cfg->get("prefix");

        $playerJoinEvent->setJoinMessage($prefix . " §c[§b+§c] §4" . $player->getName());

        $player->setAllowFlight(false);


    }


    public function onQuit(PlayerQuitEvent $playerQuitEvent){

        $player = $playerQuitEvent->getPlayer();

        $prefix = $this->cfg->get("prefix");

        $playerQuitEvent->setQuitMessage($prefix . " §c[§b-§c] §4" . $player->getName());

    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        if ($command == "hub"){

            $sender->teleport($sender->getServer()->getDefaultLevel()->getSafeSpawn());

            $prefix = $this->cfg->get("prefix");

            $sender->sendMessage($prefix." Teleported To Hub");

            $sender->getArmorInventory()->clearAll();

            $sender->getInventory()->clearAll();

            return true;

        }

        if ($command == "lobby"){

            $prefix = $this->cfg->get("prefix");

            $sender->teleport($sender->getServer()->getDefaultLevel()->getSafeSpawn());

            $sender->sendMessage($prefix." Teleported To Lobby");

            $sender->getArmorInventory()->clearAll();

            $sender->getInventory()->clearAll();


            return true;

        }

        if ($command == "spawn") {

            $prefix = $this->cfg->get("prefix");

            $sender->teleport($sender->getServer()->getDefaultLevel()->getSafeSpawn());

            $sender->sendMessage($prefix . " Teleported To Spawn");

            $sender->getArmorInventory()->clearAll();

            $sender->getInventory()->clearAll();
        }

            return true;

        }
}
