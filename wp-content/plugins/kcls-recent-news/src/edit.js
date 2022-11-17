import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import "./editor.scss";

export default function Edit() {
	const posts = useSelect((select) => {
		return select("core").getEntityRecords("postType", "post");
	}, []);

	return (
		<div className="kcls-recent-news-block">
			<div className="kcls-voice-editor-news-container">
				{!posts && "Loading"}
				{posts && posts.length === 0 && "No Posts"}
				{/* Slices the latest five blog entries and renders them into the editor */}
				{posts && posts.length > 0
					? posts.slice(0, 5).map((post, index) => {
							console.log(post);
							return (
								<div
									class={
										index === 0
											? "kcls-voice-editor-news kcls-voice-editor-news-main"
											: "kcls-voice-editor-news"
									}
								>
									<h3 className="kcls-recent-news-editor-heading">
										{post.title.rendered}
									</h3>
									{index === 0 && (
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua.
										</p>
									)}
									{/* <img src={post.featured_media} /> */}
									{/* This is not acceptable, but a starting point! */}
									{/* {post.excerpt.rendered} */}
									{/* Retrieve image based on post ID */}
									{/* <img src={post.featured_media} /> */}
								</div>
							);
					  })
					: null}
			</div>
		</div>
	);
}
