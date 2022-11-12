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
			{ className: "kcls-know-your-contract kcls-section" },
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
						[
							"core/button",
							{
								text: __("View Older Contracts..."),
								className:
									"kcls-communications-item-button kcls-small-cta-button",
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
												className: "kcls-communications-item",
											},
											[
												[
													"core/image",
													{
														url: Contract1,
														className: "kcls-communications-image",
													},
												],
												[
													"core/heading",
													{
														className: "kcls-communications-item-heading",
														level: 3,
														content: "1857M - Main Unit",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-communications-item-text",
														content:
															"All represented staff who are not supervisors, pages or in facilities.",
													},
												],
												[
													"core/button",
													{
														className:
															"kcls-communications-item-button kcls-small-cta-button",
														text: __("Read the Contract"),
														url: "http://www.google.com",
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
												className: "kcls-communications-item",
											},
											[
												[
													"core/image",
													{
														className: "kcls-communications-image",
														url: Contract2,
													},
												],
												[
													"core/heading",
													{
														className: "kcls-communications-item-heading",
														level: 3,
														content: "1857P - Page Unit",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-communications-item-text",
														content:
															"Representing all pages in the branches, Service Center and MDS",
													},
												],
												[
													"core/button",
													{
														className:
															"kcls-communications-item-button kcls-small-cta-button",
														text: __("Read the Contract"),
														url: "http://www.google.com",
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
												className: "kcls-communications-item",
											},
											[
												[
													"core/image",
													{
														className: "kcls-communications-image",
														url: Contract3,
													},
												],
												[
													"core/heading",
													{
														className: "kcls-communications-item-heading",
														level: 3,
														content: "1857F - Facilities Unit",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-communications-item-text",
														content:
															"Representing maintenance workers and AMH Service Specialists",
													},
												],
												[
													"core/button",
													{
														className:
															"kcls-communications-item-button kcls-small-cta-button",
														text: __("Read the Contract"),
														url: "http://www.google.com",
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
