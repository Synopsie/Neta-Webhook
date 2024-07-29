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
 * @author SynopsieTeam
 * @link https://neta.arkaniastudios.com/
 * @version 2.0.1
 *
 */

declare(strict_types=1);

namespace neta\class;

use JsonSerializable;

final class Message implements JsonSerializable {
	/** @var mixed[] */
	private array $data = [];

	public function setContent(string $content) : void {
		$this->data["content"] = $content;
	}

	public function setName(string $name) : void {
		$this->data["username"] = $name;
	}

	public function setAvatar(string $url) : void {
		$this->data["avatar_url"] = $url;
	}

	public function setTts(bool $tts) : void {
		$this->data["tts"] = $tts;
	}

	public function addEmbed(?Embed $embed) : void {
		if ($embed !== null) {
			$this->data["embeds"][] = $embed->__toArray();
		}
	}

	public function jsonSerialize() : array {
		return $this->data;
	}

}
