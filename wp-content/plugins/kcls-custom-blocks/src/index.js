import { registerBlockType } from "@wordpress/blocks";
import "./style.scss";
import save from "./save";
import KCLSActionBar from "./blocks/kcls-action-bar";
import KCLSCommunications from "./blocks/kcls-communications";
import KCLSMainHero from "./blocks/kcls-main-hero";
import KCLSKnowYourContract from "./blocks/kcls-know-your-contract";
import KCLSProfileCard from "./blocks/kcls-profile-card";
import KCLSLeadership from "./blocks/kcls-leadership";
import KCLSSection from "./blocks/kcls-section";
import KCLSProfileCardSection from "./blocks/kcls-profile-card-section";

registerBlockType("kcls/action-bar", {
	title: "KCLS Action Bar",
	icon: "email",
	category: "common",
	edit: KCLSActionBar,
	save,
});

registerBlockType("kcls/kcls-communications", {
	title: "KCLS Communications",
	icon: "email",
	category: "common",
	edit: KCLSCommunications,
	save,
});

registerBlockType("kcls/kcls-section", {
	title: "KCLS Section",
	icon: "email",
	category: "common",
	edit: KCLSSection,
	save,
});

registerBlockType("kcls/kcls-profile-card", {
	title: "KCLS - Profile Card",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSProfileCard,
	save,
});

registerBlockType("kcls/kcls-leadership", {
	title: "KCLS Leadership",
	icon: "email",
	category: "common",
	edit: KCLSLeadership,
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

registerBlockType("kcls/kcls-profile-card-section", {
	title: "KCLS - Profile Card Section",
	icon: "admin-customizer",
	category: "common",
	edit: KCLSProfileCardSection,
	save,
});
