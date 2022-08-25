import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSSection() {
	const KCLSSectionBlocks = [
		[
			"core/group",
			{ className: "kcls-section-title" },
			[
				[
					"core/heading",
					{
						level: 2,
						content: __("Name Your New Section"),
					},
				],
			],
		],
		["core/group", { className: "kcls-section" }, []],
	];

	return <InnerBlocks {...useBlockProps()} template={KCLSSectionBlocks} />;
}
