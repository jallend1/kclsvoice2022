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
			{ className: "kcls-communications" },
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
									"core/paragraph",
									{
										className: "kcls-communications-text",
										content: __("Email Newsletter"),
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
									"core/paragraph",
									{
										className: "kcls-communications-text",
										content: __("Find Your Steward"),
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
									"core/paragraph",
									{
										className: "kcls-communications-text",
										content: __("Text Alerts"),
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
									"core/paragraph",
									{
										className: "kcls-communications-text",
										content: __("Watercooler"),
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
