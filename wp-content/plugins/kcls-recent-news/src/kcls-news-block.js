import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "./editor.scss";

export default function KCLSNewsBlock() {
	const KCLSNewsBlockBlocks = [
		[
			"core/group",
			{ className: "kcls-news" },
			[
				[
					"core/group",
					{ className: "kcls-section-title" },
					[
						[
							"core/heading",
							{ level: 2, content: "Latest News", className: "kcls-heading" },
						],
						[
							"core/button",
							{
								text: "See All News",
								className: "kcls-read-blog-button",
								url: "/news/",
							},
						],
					],
				],
				[
					"kcls/news-core",
					{ content: "This is a placeholder for the KCLS News Block." },
				],
			],
		],
	];
	return (
		<div className="kcls-news-block">
			<InnerBlocks {...useBlockProps()} template={KCLSNewsBlockBlocks} />
		</div>
	);
}
