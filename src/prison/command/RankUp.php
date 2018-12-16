<?php
namespace prison\command;

use _64FF00\PurePerms\PPGroup;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as Text;
use prison\Prison;

class RankUp extends Command implements PluginIdentifiableCommand {
	
	public function __construct(Prison $plugin, $name, $description, $usage, array $aliases){
		parent::__construct($name, $description, $usage, $aliases);
		$this->setPermission('prison.rankup');

		$this->plugin = $plugin;
	}

	public function execute(CommandSender $sender, $label, array $args){
		if(!$this->testPermission($sender)){
			$sender->sendMessage(Text::RED."".$this->getPermissionMessage());
			return true;
		}
		if(!$sender instanceof Player){
			$sender->sendMessage(Text::RED."Run this command in-game!");
			return true;
		}
		
		$this->getPlugin()->rankup($sender);	

	}

	public function getPlugin() : Plugin {
		return $this->plugin;
	}

}