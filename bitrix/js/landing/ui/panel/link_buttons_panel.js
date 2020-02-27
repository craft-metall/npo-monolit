;(function() {
	"use strict";

	BX.namespace("BX.Landing.UI.Panel");


	/**
	 * Implements interface for works with link editor panel
	 *
	 * @extends {BX.Landing.UI.Panel.BaseButtonPanel}
	 *
	 * @param {string} id
	 * @param {string} className
	 * @constructor
	 */
	BX.Landing.UI.Panel.LinkButtons = function(id, className)
	{
		BX.Landing.UI.Panel.BaseButtonPanel.apply(this, arguments);

		this.removeButton = new BX.Landing.UI.Button.Action("remove", {
			text: BX.message("LANDING_REMOVE_LINK"),
			onClick: this.onRemove.bind(this)
		});

		this.editButton = new BX.Landing.UI.Button.Action("edit", {
			text: BX.message("LANDING_EDIT_LINK"),
			onClick: this.onEdit.bind(this)
		});

		this.addButton(this.removeButton);
		this.addButton(this.editButton);

		document.body.appendChild(this.layout);
	};


	/**
	 * Gets instance of BX.Landing.UI.Panel.LinkButtons
	 * @static
	 * @returns {BX.Landing.UI.Panel.LinkButtons}
	 */
	BX.Landing.UI.Panel.LinkButtons.getInstance = function()
	{
		if (!BX.Landing.UI.Panel.LinkButtons.instance)
		{
			BX.Landing.UI.Panel.LinkButtons.instance = new BX.Landing.UI.Panel.LinkButtons(
				"link_editor_buttons",
				"landing-ui-panel-link-editor-buttons"
			);
		}

		return BX.Landing.UI.Panel.LinkButtons.instance;
	};


	/**
	 * Stores instance
	 * @static
	 * @type {?BX.Landing.UI.Panel.LinkButtons}
	 */
	BX.Landing.UI.Panel.LinkButtons.instance = null;


	BX.Landing.UI.Panel.LinkButtons.prototype = {
		constructor: BX.Landing.UI.Panel.LinkButtons,
		__proto__: BX.Landing.UI.Panel.BaseButtonPanel.prototype,

		show: function(link)
		{
			this.currentLink = link;
			var range = document.createRange();
			var scroll = window.scrollY;
			range.selectNode(this.currentLink);
			window.getSelection().removeAllRanges();
			window.getSelection().addRange(range);

			this.linkRect = link.getBoundingClientRect();

			requestAnimationFrame(function() {
				this.layout.style.position = "fixed";
				this.layout.style.top = this.linkRect.bottom + scroll + "px";
				this.layout.style.left = this.linkRect.left + "px";
			}.bind(this));

			BX.Landing.UI.Panel.BaseButtonPanel.prototype.show.call(this);
		},

		onRemove: function()
		{
			document.execCommand("unlink", false);
			this.hide();
		},

		onEdit: function(event)
		{
			event.preventDefault();
			event.stopPropagation();

			if (!this.editPanel)
			{
				this.editPanel = new BX.Landing.UI.Panel.Content("create_link");
				this.editPanel.appendFooterButton(
					new BX.Landing.UI.Button.BaseButton("save_block_content", {
						text: BX.message("BLOCK_SAVE"),
						onClick: this.save.bind(this),
						className: "landing-ui-button-content-save"
					})
				);
				this.editPanel.appendFooterButton(
					new BX.Landing.UI.Button.BaseButton("cancel_block_content", {
						text: BX.message("BLOCK_CANCEL"),
						onClick: this.editPanel.hide.bind(this.editPanel),
						className: "landing-ui-button-content-cancel"
					})
				);

				document.body.appendChild(this.editPanel.layout);
			}

			BX.Landing.UI.Panel.EditorPanel.hide();
			BX.Landing.UI.Panel.SmallEditorPanel.hide();

			this.range = document.getSelection().getRangeAt(0);
			this.textNode = BX.Landing.Block.Node.Text.currentNode;
			this.textField = BX.Landing.UI.Field.BaseField.currentField;

			if (!!this.textField && this.textField.isEditable())
			{
				this.textNode = this.textField;
			}

			var mess = "LANDING_CREATE_LINK";

			if (this.range.toString())
			{
				mess = "LANDING_EDIT_LINK";
			}

			var form = new BX.Landing.UI.Form.BaseForm({title: BX.message(mess)});
			var link = !!this.textNode.node ? this.textNode.node.querySelector("a") : this.textNode.layout.querySelector("a");

			this.field = new BX.Landing.UI.Field.Link({
				text: this.range.toString(),
				href: !!link ? link.getAttribute("href") : "",
				target: !!link ? link.getAttribute("target") : ""
			});

			var field = this.field;

			if (link)
			{
				var href = link.getAttribute("href");

				if (href && href.indexOf("{=") !== -1)
				{
					BX.Landing.UI.Panel.URLList.getInstance().getEntries().then(function(result) {
						result.forEach(function(landing) {
							var landingPlaceholder = "{=LANDING["+landing.ID+"].URL}";
							if (href === landingPlaceholder)
							{
								field.hrefInput.setValue(BX.Landing.UI.Field.LinkURL.prototype.createPlaceholder(landing.TITLE, landing.ID, "LANDING"));
							}

							landing.blocks.forEach(function(block) {
								var blockPlaceholder = "{=BLOCK["+block.id+"].URL}";
								if (href === blockPlaceholder)
								{
									field.hrefInput.setValue(BX.Landing.UI.Field.LinkURL.prototype.createPlaceholder(block.name, block.id, "LANDING"));
								}
							});
						});
					});
				}
			}

			form.addField(this.field);

			this.editPanel.clear();
			this.editPanel.appendForm(form);
			this.editPanel.show();
			this.hide();
		},

		save: function()
		{
			document.getSelection().removeAllRanges();
			document.getSelection().addRange(this.range);
			this.textNode.enableEdit();
			document.execCommand("insertHTML", false, "<a href=\""+this.field.getValue().href+"\" target=\""+this.field.getValue().target+"\">"+this.field.getValue().text+"</a>");
			this.editPanel.hide();
		}
	}
})();