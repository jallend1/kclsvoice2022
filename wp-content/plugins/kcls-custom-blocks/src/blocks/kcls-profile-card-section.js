import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSProfileCardSection() {
	const KCLSProfileCardSectionBlocks = [
		[
			"core/group",
			{ className: "kcls-profile-card-section kcls-section" },
			[
				[
					"core/group",
					{ className: "kcls-section-title" },
					[
						[
							"core/heading",
							{
								level: 2,
								content: __("Meet Our Team"),
							},
						],
					],
				],
				[
					"core/group",
					{ className: "kcls-profile-card-section-content" },
					[
						["kcls/kcls-profile-card"],
						["kcls/kcls-profile-card"],
						["kcls/kcls-profile-card"],
						["kcls/kcls-profile-card"],
					],
				],
			],
		],
	];
	return (
		<InnerBlocks {...useBlockProps()} template={KCLSProfileCardSectionBlocks} />
	);
}
