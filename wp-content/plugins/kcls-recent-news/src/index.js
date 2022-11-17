import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import KCLSNewsBlock from "./kcls-news-block";
import Edit from "./edit";
import metadata from "./block.json";
import save from "./save";

registerBlockType("kcls/news-core", {
	title: "KCLS News Core",
	icon: "email",
	category: "common",
	edit: Edit,
	save: () => null,
});

registerBlockType(metadata.name, {
	edit: KCLSNewsBlock,
	save,
});
