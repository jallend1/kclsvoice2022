import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import save from "./save";
import KCLSCommunications from "./blocks/kcls-communications";
import KCLSMainHero from "./blocks/kcls-main-hero";
import KCLSKnowYourContract from "./blocks/kcls-know-your-contract";
import KCLSStayActive from "./blocks/kcls-stay-active";
import KCLSProfileCard from "./blocks/kcls-profile-card";

registerBlockType("kcls/kcls-communications", {
	title: "KCLS Communications",
	icon: "email",
	category: "common",
	edit: KCLSCommunications,
	save,
});

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

registerBlockType("kcls/stay-active", {
	title: "KCLS - Stay Active",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSStayActive,
	save,
});

registerBlockType("kcls/kcls-profile-card", {
	title: "KCLS - Profile Card",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSProfileCard,
	save,
});
