import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import KCLSNewsBlock from "./kcls-news-block";
import Edit from "./edit";
import metadata from "./block.json";
import save from "./save";

// The block that renders the blogs
registerBlockType("kcls/news-core", {
	title: "KCLS News Core",
	icon: "email",
	category: "common",
	edit: Edit,
	save: () => null,
});

// The OVERALL block that contains the News Core block AND the headings
registerBlockType(metadata.name, {
	edit: KCLSNewsBlock,
	save,
});
