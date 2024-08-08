<?php

/*
 *  ____   __   __  _   _    ___    ____    ____    ___   _____
 * / ___|  \ \ / / | \ | |  / _ \  |  _ \  / ___|  |_ _| | ____|
 * \___ \   \ V /  |  \| | | | | | | |_) | \___ \   | |  |  _|
 *  ___) |   | |   | |\  | | |_| | |  __/   ___) |  | |  | |___
 * |____/    |_|   |_| \_|  \___/  |_|     |____/  |___| |_____|
 *
 * Cet API permet de gérer de manière facile les webhooks/message envoyés sur discord.
 *
 * @author Synopsie
 * @link https://neta.arkaniastudios.com/
 * @version 2.1.0
 *
 */

declare(strict_types=1);

namespace neta\events;

use neta\class\Message;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\Event;

class WebhookSendEvent extends Event implements Cancellable {
	use CancellableTrait;

	public function __construct(
		private string $url,
		private Message $message,
	) {
	}

	public function setMessage(Message $message) : void {
		$this->message = $message;
	}

	public function getMessage() : Message {
		return $this->message;
	}

	public function setUrl(string $url) : void {
		$this->url = $url;
	}

	public function getUrl() : string {
		return $this->url;
	}

}
