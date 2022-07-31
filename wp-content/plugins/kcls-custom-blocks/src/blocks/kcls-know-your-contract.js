import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

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
								className: "kcls-know-your-contract",
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
														className: "kcls-contract-image",
													},
												],
												[
													"core/paragraph",
													{
														className: "kcls-contract-title",
														content: __("Contract Title"),
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
