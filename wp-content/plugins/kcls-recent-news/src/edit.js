import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<p {...useBlockProps()}>
			{__(
				"News will appear here, but for now it is not visible in from the editor.",
				"kcls-recent-news"
			)}
		</p>
	);
}
