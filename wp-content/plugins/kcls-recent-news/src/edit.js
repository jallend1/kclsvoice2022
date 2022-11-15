import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import "./editor.scss";

export default function Edit() {
	const posts = useSelect((select) => {
		return select("core").getEntityRecords("postType", "post");
	}, []);

	const KCLSRecentNewsBlocks = [
		[
			"core/group",
			{ className: "kcls-section-title" },
			[
				[
					"core/heading",
					{
						level: 2,
						content: __("Latest News"),
					},
				],
				[
					"core/button",
					{
						text: __("See All News..."),
						className: "kcls-read-blog-button kcls-small-cta-button",
						url: "/news/",
					},
				],
			],
		],
	];
	return (
		<div>
			<InnerBlocks template={KCLSRecentNewsBlocks} {...useBlockProps()} />
			{/* {__(
				"The latest blog posts will appear here on the public facing page, but for now it is not visible in from the editor.",
				"kcls-recent-news"
			)} */}
			<div className="kcls-voice-editor-news-container">
				{!posts && "Loading"}
				{posts && posts.length === 0 && "No Posts"}
				{/* Slices the latest five blog entries and renders them into the editor */}
				{posts && posts.length > 0
					? posts.slice(0, 5).map((post, index) => {
							return (
								<div
									class={
										index === 0
											? "kcls-voice-editor-news kcls-voice-editor-news-main"
											: "kcls-voice-editor-news"
									}
								>
									<a href={post.link}>{post.title.rendered}</a>
								</div>
							);
					  })
					: null}
			</div>
		</div>
	);
}
