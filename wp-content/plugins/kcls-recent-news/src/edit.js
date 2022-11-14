import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import "./editor.scss";

export default function Edit() {
	const posts = useSelect((select) => {
		return select("core").getEntityRecords("postType", "post");
	}, []);
	return (
		<div {...useBlockProps()} className="kcls-voice-editor-news-container">
			{/* {__(
				"The latest blog posts will appear here on the public facing page, but for now it is not visible in from the editor.",
				"kcls-recent-news"
			)} */}
			{!posts && "Loading"}
			{posts && posts.length === 0 && "No Posts"}
			{posts && posts.length > 0
				? posts.slice(0, 5).map((post, index) => {
						{
							/* Slices the latest five blog entries and renders them into the editor */
						}
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
	);
}
