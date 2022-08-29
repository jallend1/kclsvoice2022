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
										url: StewardIcon,
									},
								],
								[
									"core/button",
									{
										className: "kcls-communications-text",
										text: __("Find Your Steward"),
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
									},
								],
								[
									"core/button",
									{
										className: "kcls-communications-text",
										text: __("Text Alerts"),
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
									},
								],
								[
									"core/button",
									{
										className: "kcls-communications-text",
										text: __("Watercooler"),
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
