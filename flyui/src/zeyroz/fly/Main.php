<?php

namespace zeyroz\fly;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use zeyroz\fly\form\Flyui;


class Main extends PluginBase implements Listener
{
    /**
     * @var Main
     */


    public static $instance;

    private static function getInstance()
    {
        return self::$instance;
    }

    public function onEnable()
    {
        $this->getLogger()->info("§1plugin flyui à été créer par zeyroz");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);

        self::$instance = $this;

        if(!Server::getInstance()->getPluginManager()->getPlugin("FormAPI")){
            Server::getInstance()->getPluginManager()->disablePlugin($this);
            $this->getServer()->getLogger()->alert("Veuillez mettre FormAPI");
        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if($cmd == "fly"){
            if($sender instanceof Player) {
                if(empty($args[0])){
                    Flyui::flyui($sender);
                }else{
                    $sender->sendMessage("Usage: /fly");
                }
            }
        }return true;
    }

}