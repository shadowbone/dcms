export const updateActiveCellPosition = ({ dispatch }, rowIndex, columnIndex) => {
    dispatch('ACTIVE_CELL_POSITION', rowIndex, columnIndex);
};

export const sendMessages = ({dispatch},messages) => {
	dispatch('SEND_MESSAGES',messages);
};