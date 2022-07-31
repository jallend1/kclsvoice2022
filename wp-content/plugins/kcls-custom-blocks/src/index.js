import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import save from "./save";
import KCLSMainHero from "./blocks/kcls-main-hero";
import KCLSKnowYourContract from "./blocks/kcls-know-your-contract";

registerBlockType("kcls/main-hero", {
	title: "KCLS - Hero",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSMainHero,
	save,
});

registerBlockType("kcls/know-your-contract", {
	title: "KCLS - Know Your Contract",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSKnowYourContract,
	save,
});
