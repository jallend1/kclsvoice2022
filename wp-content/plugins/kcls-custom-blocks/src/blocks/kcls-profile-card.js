import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSProfileCard() {
	const KCLSProfileCardBlocks = [
		[
			"core/group",
			{ className: "kcls-profile-card" },
			[
				[
					"core/image",
					{ url: "https://picsum.photos/200", className: "kcls-profile-image" },
				],
				[
					"core/heading",
					{
						level: 2,
						content: "President",
					},
				],
				[
					"core/heading",
					{
						level: 3,
						content: "John Doe",
					},
				],
				[
					"core/paragraph",
					{
						content:
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod, nisi euismod consectetur aliquam, nisl nisi consectetur nisl, euismod nisi nisl euismod nisl.",
					},
				],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSProfileCardBlocks} />;
}
