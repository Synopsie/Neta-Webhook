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

namespace neta\format;

function underline(string $text) : string {
	return '__' . $text . '__';
}

function bolt(string $text) : string {
	return '**' . $text . '**';
}

function italic(string $text) : string {
	return '*' . $text . '*';
}

function highlight(string $text) : string {
	return '~~' . $text . '~~';
}

function title(string $text) : string {
	return '# ' . $text;
}

function subTitle(string $text) : string {
	return '## ' . $text;
}

function littleTitle(string $text) : string {
	return '### ' . $text;
}

function hyperlink(string $text, string $url) : string {
	return '[' . $text . '](' . $url . ')';
}
