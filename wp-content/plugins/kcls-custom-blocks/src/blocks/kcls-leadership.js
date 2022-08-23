import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSLeadership() {
	const KCLSLeadershipBlocks = [
		[
			"core/group",
			{ className: "kcls-leadership kcls-section" },
			[
				[
					"core/group",
					{ className: "kcls-section-title" },
					[
						[
							"core/heading",
							{
								level: 2,
								content: __("Meet the Leadership"),
							},
						],
					],
				],
				["core/group", { className: "kcls-leadership-content" }, []],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSLeadershipBlocks} />;
}
