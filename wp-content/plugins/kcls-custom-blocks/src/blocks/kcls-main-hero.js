import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";
import KCLSBackgroundImage from "../images/snoqualmie.jpg";

export default function KCLSMainHero() {
	const KCLSMainHeroBlocks = [
		[
			"core/cover",
			{
				url: KCLSBackgroundImage,
				dimRatio: 50,
				className: "kcls-main-banner",
			},
			[
				[
					"core/group",
					{ className: "kcls-hero-content" },
					[
						[
							"core/group",
							{ className: "left-header" },
							[
								[
									"core/heading",
									{
										level: 1,
										content: "Local 1857",
									},
								],
								[
									"core/heading",
									{
										level: 2,
										content:
											"King County Library System employees are stronger together.",
									},
								],
								[
									"core/paragraph",
									{
										content:
											"When you signed your membership card, you became part of an employee Union that represents approximately 1,000 members at KCLS. Membership gives you the right to participate in decisions that affect your wages, hours, and working conditions. Union members participate in the democratic governance of the Union, and have access to member-only benefits.",
									},
								],
							],
						],
						[
							"core/group",
							{ className: "right-header" },
							[
								[
									"core/button",
									{ className: "kcls-cta-button", text: "Get Involved" },
								],
							],
						],
					],
				],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSMainHeroBlocks} />;
}
