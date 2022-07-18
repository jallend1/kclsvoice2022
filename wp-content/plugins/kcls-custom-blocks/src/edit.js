import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<p {...useBlockProps()}>
			{__("Kcls Custom Blocks – hello from the editor!", "kcls-custom-blocks")}
		</p>
	);
}
