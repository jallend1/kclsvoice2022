import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import DefaultImage from "../images/teamwork.jpg";
import "../editor.scss";

export default function KCLSStayActive() {
	const KCLSStayActiveBlocks = [
		[
			"core/group",
			{ className: "kcls-stay-active-section" },
			[
				[
					"core/group",
					{ className: "kcls-stay-active-section-content" },
					[
						[
							"core/group",
							{ className: "kcls-stay-active-section-image" },
							[
								[
									"core/image",
									{
										url: DefaultImage,
									},
								],
							],
						],
						[
							"core/group",
							{ className: "kcls-stay-active-section-text" },
							[
								[
									"core/heading",
									{
										level: 2,
										className: "kcls-stay-active-section-title",
										content: __("Stay Active"),
									},
								],
								[
									"core/paragraph",
									{
										className: "kcls-stay-active-section-text",
										content: __(
											"It’s important to keep your information up to date with our union! Fill out this form to keep things current."
										),
									},
								],
							],
						],
						[
							"core/group",
							{ className: "kcls-stay-active-section-cta-button" },
							[
								[
									"core/button",
									{
										className: "kcls-stay-active-section-cta-button",
										href: "https://www.kcls.org/stay-active/",
										target: "_blank",
										text: __("Update or Confirm Your Membership"),
									},
								],
							],
						],
					],
				],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSStayActiveBlocks} />;
}
