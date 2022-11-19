import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";
import ChatIcon from "../images/chat.svg";
import EmailIcon from "../images/email.svg";
import WatercoolerIcon from "../images/watercooler.svg";
import StewardIcon from "../images/people.svg";

export default function KCLSCommunications() {
	const KCLSCommunicationsBlocks = [
		[
			"core/group",
			{ className: "kcls-communications kcls-section" },
			[
				[
					"core/group",
					{ className: "kcls-section-title" },
					[
						[
							"core/heading",
							{
								level: 2,
								content: __("Stay In Touch"),
							},
						],
					],
				],
				[
					"core/group",
					{ className: "kcls-communications-content" },
					[
						[
							"core/group",
							{
								className: "kcls-communications-item",
							},
							[
								[
									"core/image",
									{
										className: "kcls-communications-image",
										url: EmailIcon,
										alt: "Envelope",
									},
								],
								[
									"core/heading",
									{
										className: "kcls-communications-item-heading",
										level: 3,
										content: "Email Newsletter",
									},
								],
								[
									"core/paragraph",
									{
										className: "kcls-communications-item-text",
										content:
											"Weekly missives from our union’s leadership with news and meeting details",
									},
								],
								[
									"core/button",
									{
										className:
											"kcls-communications-item-button kcls-small-cta-button",
										text: __("Learn More"),
										url: "http://www.google.com",
									},
								],
							],
						],
						[
							"core/group",
							{
								className: "kcls-communications-item",
							},
							[
								[
									"core/image",
									{
										className: "kcls-communications-image",
										url: ChatIcon,
										alt: "Chat bubbles",
									},
								],
								[
									"core/heading",
									{
										className: "kcls-communications-item-heading",
										level: 3,
										content: "Text Alerts",
									},
								],
								[
									"core/paragraph",
									{
										className: "kcls-communications-item-text",
										content:
											"Infrequent messages to your phone with urgent information",
									},
								],
								[
									"core/button",
									{
										className:
											"kcls-communications-item-button kcls-small-cta-button",
										text: __("Learn More"),
										url: "http://www.google.com",
									},
								],
							],
						],
						[
							"core/group",
							{
								className: "kcls-communications-item",
							},
							[
								[
									"core/image",
									{
										className: "kcls-communications-image",
										url: WatercoolerIcon,
										alt: "Three people connected",
									},
								],
								[
									"core/heading",
									{
										className: "kcls-communications-item-heading",
										level: 3,
										content: "Watercooler",
									},
								],
								[
									"core/paragraph",
									{
										className: "kcls-communications-item-text",
										content:
											"An informal message group for member-to-member communication",
									},
								],
								[
									"core/button",
									{
										className:
											"kcls-communications-item-button kcls-small-cta-button",
										text: __("Learn More"),
										url: "http://www.google.com",
									},
								],
							],
						],
						[
							"core/group",
							{
								className: "kcls-communications-item",
							},
							[
								[
									"core/image",
									{
										className: "kcls-communications-image",
										url: StewardIcon,
										alt: "A person in a map pin",
									},
								],
								[
									"core/heading",
									{
										className: "kcls-communications-item-heading",
										level: 3,
										content: "Find Your Steward",
									},
								],
								[
									"core/paragraph",
									{
										className: "kcls-communications-item-text",
										content: "Locate your closest union steward",
									},
								],
								[
									"core/button",
									{
										className:
											"kcls-communications-item-button kcls-small-cta-button",
										text: __("Learn More"),
										url: "http://www.google.com",
									},
								],
							],
						],
					],
				],
			],
		],
	];

	return (
		<InnerBlocks {...useBlockProps()} template={KCLSCommunicationsBlocks} />
	);
}
