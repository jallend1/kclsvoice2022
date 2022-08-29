import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSActionBar() {
	const KCLSActionBarBlocks = [
		[
			"core/group",
			{ className: "kcls-action-bar" },
			[
				[
					"core/paragraph",
					{
						className: "kcls-action-bar-text",
						content: "Have a concern? Get in touch with your union leadership!",
					},
				],
				[
					"core/button",
					{ className: "kcls-action-bar-cta-button", text: "CONTACT" },
				],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSActionBarBlocks} />;
}
