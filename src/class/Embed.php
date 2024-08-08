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

namespace neta\class;

final class Embed {
	private array $data;

	public function __toArray() : array {
		return $this->data;
	}

	public function setTitle(string $title) : self {
		$this->data["title"] = $title;
		return $this;
	}

	public function setDescription(string $description) : self {
		$this->data['description'] = $description;
		return $this;
	}

	public function setFooter(string $footer, ?string $iconUrl) : self {
		$this->data['footer'] = [
			'text'     => $footer,
			'icon_url' => $iconUrl
		];
		return $this;
	}

	public function setColor(int $color) : self {
		$this->data['color'] = $color;
		return $this;
	}

	public function setThumbnail(string $url) : self {
		$this->data['thumbnail'] = [
			'url' => $url
		];
		return $this;
	}

	public function setImage(string $url) : self {
		$this->data['image'] = [
			'url' => $url
		];
		return $this;
	}

	public function setAuthor(string $name, ?string $url = null, ?string $iconUrl = null) : self {
		$this->data['author'] = [
			'name'     => $name,
			'url'      => $url,
			'icon_url' => $iconUrl
		];
		return $this;
	}

	public function addField(string $name, string $value, bool $inline = false) : self {
		$this->data['fields'][] = [
			'name'   => $name,
			'value'  => $value,
			'inline' => $inline
		];
		return $this;
	}

}
