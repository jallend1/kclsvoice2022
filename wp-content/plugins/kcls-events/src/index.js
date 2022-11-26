import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import Edit from "./edit";
import Save from "./save";
import KCLSEventBlock from "./kcls-event-block";

import metadata from "./block.json";

registerBlockType("kcls/events-core", {
	title: "KCLS Event Core",
	icon: "email",
	category: "common",
	edit: Edit,
	save: () => null,
});

registerBlockType(metadata.name, {
	edit: KCLSEventBlock,
	save: Save,
});
