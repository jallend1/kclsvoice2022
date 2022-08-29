import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSActionBar() {
	const KCLSActionBarBlocks = [
		[
			"core/group",
			{ className: "kcls-action-bar" },
			[
				["core/paragraph", { className: "kcls-action-bar-text" }],
				["core/button", { className: "kcls-action-bar-cta-button" }],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSActionBarBlocks} />;
}
