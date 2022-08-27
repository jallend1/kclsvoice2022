import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import Teamwork from "../images/teamwork.jpg";
import "../editor.scss";

export default function KCLSStayActive() {
	const KCLSStayActiveBlocks = [
		[
			"core/group",
			{ className: "kcls-stay-active-section" },
			[
				[
					"core/group",
					{ className: "kcls-stay-active-section-content kcls-section" },
					[
						[
							"core/group",
							{ className: "kcls-stay-active-section-image" },
							[
								[
									"core/image",
									{
										url: Teamwork,
										alt: "Teamwork makes the dream work.",
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
											"It’s important to keep your information up to date! Fill out this form to keep things current."
										),
									},
								],
							],
						],
						[
							"core/group",
							{ className: "kcls-stay-active-cta-button-section" },
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
