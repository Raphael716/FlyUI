<?php

namespace zeyroz\fly\form;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\form\Form;
use pocketmine\item\Bread;
use pocketmine\Player;
use pocketmine\Server;
use zeyroz\fly\Main;

class Flyui extends SimpleForm {

    public static function flyui(Player $player)
    {
        if ($player instanceof Player) {
            $api = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $player, int $data = null) {
                $result = $data;
                if ($result === null) {
                    return true;
                }
                switch ($result){
                    case 0:
                        if ($player instanceof Player) {
                            $player->setAllowFlight(true);
                            $player->setFlying(true);
                            $player->sendPopup("§aFly activé");
                        }
                        break;
                    case 1:
                        if ($player instanceof Player) {
                            $player->setAllowFlight(true);
                            $player->setFlying(false);
                            $player->sendPopup("§4Fly désactivé");
                        }
                    case 2:
                        return true;
                }

            });
         $form->setTitle("§f-- §6Fly UI§f --");
         $form->setContent("Choissisez ce que vous souhaitez faire");
         $form->addButton("§f- §aActivé ");
         $form->addButton("§f- §cDésactivé ");
         $form->addButton("§0-- Sortir --");
         $player->sendForm($form);
        }
    }
}