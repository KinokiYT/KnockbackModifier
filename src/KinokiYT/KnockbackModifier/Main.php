<?php

namespace KinokiYT\KnockbackModifier;
use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;

use pocketmine\entity\Entity;

use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onKnockback(EntityDamageByEntityEvent $event) {
        if($event instanceof EntityDamageByEntityEvent){
            if($event->getEntity() instanceof Player && $event->getDamager() instanceof Player) {
                $amplifier = $this->getConfig()->get("Knockback Amplifier");
                $event->setKnockBack($amplifier);
            }
        }
    }
}