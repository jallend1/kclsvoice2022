import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

export default function save() {
	return (
		<p {...useBlockProps.save()}>
			{__(
				"Kcls Custom Blocks – hello from the saved content!",
				"kcls-custom-blocks"
			)}
		</p>
	);
}
