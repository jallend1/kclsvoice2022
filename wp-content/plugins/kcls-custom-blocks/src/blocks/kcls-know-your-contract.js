import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";
import Contract1 from "../images/contract-1.png";
import Contract2 from "../images/contract-2.png";
import Contract3 from "../images/contract-3.png";

export default function KCLSKnowYourContract() {
	const KCLSKnowYourContractBlocks = [
		[
			"core/group",
			{ className: "kcls-know-your-contract" },
			[
				[
					"core/group",
					{ className: "kcls-section-title" },
					[
						[
							"core/heading",
							{
								level: 2,
								content: __("Know Your Contract"),
							},
						],
					],
				],
				[
					"core/group",
					{ className: "kcls-contracts" },
					[
						[
							"core/columns",
							{ className: "kcls-contracts-columns" },
							[
								[
									"core/column",
									{ className: "kcls-contracts-column" },
									[
										[
											"core/group",
											{
												className: "kcls-contract",
											},
											[
												[
													"core/image",
													{
														url: Contract1,
														className: "kcls-contract-image",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-contract-title",
														content: __("Facilities Contract"),
													},
												],
											],
										],
									],
								],
								[
									"core/column",
									{ className: "kcls-contracts-column" },
									[
										[
											"core/group",
											{
												className: "kcls-contract",
											},
											[
												[
													"core/image",
													{
														url: Contract2,
														className: "kcls-contract-image",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-contract-title",
														content: __("Main Unit"),
													},
												],
											],
										],
									],
								],
								[
									"core/column",
									{ className: "kcls-contracts-column" },
									[
										[
											"core/group",
											{
												className: "kcls-contract",
											},
											[
												[
													"core/image",
													{
														url: Contract3,
														className: "kcls-contract-image",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-contract-title",
														content: __("Page Unit"),
													},
												],
											],
										],
									],
								],
							],
						],
					],
				],
			],
		],
	];
	return (
		<InnerBlocks {...useBlockProps()} template={KCLSKnowYourContractBlocks} />
	);
}
