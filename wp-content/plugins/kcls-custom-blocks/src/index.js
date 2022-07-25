import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import Edit from "./edit";
import save from "./save";
import metadata from "./block.json";
import KCLSMainHero from "./blocks/kcls-main-hero";

registerBlockType("kcls/main-hero", {
	title: "KCLS - Hero",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSMainHero,
	save,
});
