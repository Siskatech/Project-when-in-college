package ProjectFinal;

import java.awt.EventQueue;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.swing.JFrame;
import javax.swing.JPanel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Font;
import javax.swing.border.TitledBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.JTable;
import javax.swing.table.*;
import javax.swing.JScrollPane;
import javax.swing.JSpinner;
import javax.swing.border.EtchedBorder;
import java.awt.Color;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import javax.swing.JEditorPane;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

public class BookShop {

	private JFrame frame;
	private JTextField txtbook;
	private JTextField txtprice;
	private JTextField txtcode1;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					BookShop window = new BookShop();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public BookShop() {
		initialize();
		Connect();
	}
	
	Connection con ;
	PreparedStatement pst;
	PreparedStatement pst1;
	ResultSet rs;
	DefaultTableModel df;
	
	private JTextField txtpay;
	private JTextField txtbalance;
	private JTextField txttotalcost;
	private JTable table;
	
	public void Connect() {
		try {
			con = DriverManager.getConnection("jdbc:msql://localhost/inventorybook", "root", "");
			
		}
		catch (SQLException ex) {
		}
	}
	
	public void sales() {
		
		String totalcost = txttotalcost.getText();
		String pay = txtpay.getText();
		String bal = txtbalance.getText();
		
		int lastid = 0;
		
		try {
			String query = "insert into salesbook(subtotal, pay, balance) values(?,?,?)";
			pst = con.prepareStatement(query,Statement.RETURN_GENERATED_KEYS);
			pst.setString(1, totalcost);
			pst.setString(2, pay);
			pst.setString(3, bal);
			pst.executeUpdate();
			rs = pst.getGeneratedKeys();
			
			if(rs.next()) {
				lastid = rs.getInt(1);
				
			}
		
			int rows = table.getRowCount();
			
			
			
			String query1 = "insert into displaybook(book_code,book_name,price,qty,total) values(?,?,?,?,?)";
			pst1 = con.prepareStatement(query1);
			
			String bcode = "";
			String bname;
			String price;
			String qty;
			int total = 0;
			
			for(int i=0; i<table.getRowCount(); i++) {
				bcode =(String)table.getValueAt(i, 0);
				bname = (String)table.getValueAt(i,1);
				price = (String)table.getValueAt(i,2);
				qty = (String)table.getValueAt(i,3);
				total = (int)table.getValueAt(i,4);
				
				pst1.setInt(1, lastid);
				pst1.setString(2, bcode);
				pst1.setString(3, bname);
			 	pst1.setString(4, price);
				pst1.setString(5, qty);
				pst1.setInt(6, total);
				pst1.executeUpdate();
			}
			
			JOptionPane.showInternalMessageDialog(null, "Sales Completedddddddd");
		}
		catch(SQLException e) {
			Logger.getLogger(BookShop.class.getName()).log(Level.SEVERE, null, e);
		}
	}
	

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 914, 599);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		JLabel lblNewLabel = new JLabel("BOOK SHOP");
		lblNewLabel.setFont(new Font("Cambria Math", Font.BOLD, 30));
		lblNewLabel.setBounds(307, 0, 197, 71);
		frame.getContentPane().add(lblNewLabel);
		
		JPanel pane1 = new JPanel();
		pane1.setBorder(new TitledBorder(new EtchedBorder(EtchedBorder.LOWERED, new Color(255, 255, 255), new Color(160, 160, 160)), "Data Book", TitledBorder.LEADING, TitledBorder.TOP, null, new Color(0, 0, 0)));
		pane1.setBounds(24, 70, 371, 292);
		frame.getContentPane().add(pane1);
		pane1.setLayout(null);
		
		JLabel lblNewLabel_1_2 = new JLabel("Book Code");
		lblNewLabel_1_2.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_2.setBounds(23, 24, 91, 33);
		pane1.add(lblNewLabel_1_2);
		
		JLabel lblNewLabel_1 = new JLabel("Book Name");
		lblNewLabel_1.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1.setBounds(23, 77, 91, 33);
		pane1.add(lblNewLabel_1);
		
		JLabel lblNewLabel_1_1 = new JLabel("Price");
		lblNewLabel_1_1.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_1.setBounds(23, 137, 91, 33);
		pane1.add(lblNewLabel_1_1);
		
		JLabel lblNewLabel_1_1_1 = new JLabel("Qty");
		lblNewLabel_1_1_1.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_1_1.setBounds(23, 181, 91, 33);
		pane1.add(lblNewLabel_1_1_1);
		
		txtbook = new JTextField();
		txtbook.setBounds(143, 81, 177, 26);
		pane1.add(txtbook);
		txtbook.setColumns(10);
		
		txtprice = new JTextField();
		txtprice.setColumns(10);
		txtprice.setBounds(143, 136, 177, 26);
		pane1.add(txtprice);
		
		JSpinner txtqty = new JSpinner();
		txtqty.setBounds(143, 186, 85, 25);
		pane1.add(txtqty);
		
		txtcode1 = new JTextField();
		txtcode1.addKeyListener(new KeyAdapter() {
			@Override
			public void keyPressed(KeyEvent e) {
				if(e.getKeyCode() == KeyEvent.VK_ENTER) {
					try {
					String selectSQL = String.format("SELECT * FROM booksold WHERE book_code = ?");
					String bcode = txtcode1.getText();
					pst = con.prepareStatement(selectSQL);
					pst.setString(1, bcode);
					rs = pst.executeQuery();
					
					if(rs.next() == false) {
						JOptionPane.showMessageDialog(null, "Book Code not Found");
					}
					else {
						String bname = rs.getString("bname");
						txtbook.setText(bname.trim());
						
						String price = rs.getString("price");
						txtprice.setText(price.trim());
						
						txtqty.requestFocus();
					}
					}catch (SQLException e1) {
						e1.printStackTrace();
						}
				}
			}
		});
		txtcode1.setColumns(10);
		txtcode1.setBounds(143, 24, 177, 26);
		pane1.add(txtcode1);
		
		JButton btnNewButton = new JButton("Add");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				int price = Integer.parseInt(txtprice.getText());
				int qty = Integer.parseInt(txtqty.getValue().toString());
				
				int total = price*qty;
				
				df =(DefaultTableModel)table.getModel();
				df.addRow(new Object[] {
						txtcode1.getText(),
						txtbook.getText(),
						txtprice.getText(),
						txtqty.getValue().toString(),
						total
				});
				
				int sum = 0;
				for(int i=0; i<table.getRowCount(); i++) {
					sum = sum + Integer.parseInt(table.getValueAt(i,4).toString());
				}
				
				txttotalcost.setText(String.valueOf(sum));
				txtcode1.setText("");
				txtbook.setText("");
				txtprice.setText("");
				txtqty.setValue(0);
				txtcode1.requestFocus();
			}
		});
		btnNewButton.setBounds(251, 177, 80, 42);
		pane1.add(btnNewButton);
		
		JButton btnUpdate = new JButton("Update");
		btnUpdate.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				DefaultTableModel df = (DefaultTableModel)table.getModel();
				if(table.getSelectedRowCount() == 1) {
					String bcode = txtcode1.getText();
					String bname = txtbook.getText();
					int price = Integer.parseInt(txtprice.getText());
					int qty = Integer.parseInt(txtqty.getValue().toString());
					int total = price*qty;
					
					//set update
					
					
					df.setValueAt(bcode, table.getSelectedRow(),0);
					df.setValueAt(bname, table.getSelectedRow(),1);
					df.setValueAt(price, table.getSelectedRow(),2);
					df.setValueAt(qty, table.getSelectedRow(),3);
					df.setValueAt(total,table.getSelectedRow(), 4);
					
					int sum = 0;
					sum = sum+ total;
					txttotalcost.setText(String.valueOf(sum));

				}else {
					if(table.getSelectedRowCount()== 0) {
						JOptionPane.showMessageDialog(btnUpdate, "Table is Empty");
					}else {
						JOptionPane.showMessageDialog(btnUpdate, "Please select single Row For Update");
					}
				}
				}
				
		});
		btnUpdate.setBounds(122, 244, 98, 33);
		pane1.add(btnUpdate);
		
		JButton btnExit_1_1 = new JButton("Delete");
		btnExit_1_1.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				DefaultTableModel df = (DefaultTableModel)table.getModel();
				if(table.getSelectedRowCount() == 1) {
					df.removeRow(table.getSelectedRow());

				}else {
					if(table.getSelectedRowCount()== 0) {
						JOptionPane.showMessageDialog(btnUpdate, "Table is Empty");
					}else {
						JOptionPane.showMessageDialog(btnUpdate, "Please select single Row For Update");
					}
				}

			}
		});
		btnExit_1_1.setBounds(242, 244, 100, 33);
		pane1.add(btnExit_1_1);
		
		JPanel panel_1 = new JPanel();
		panel_1.setLayout(null);
		panel_1.setBorder(new TitledBorder(new EtchedBorder(EtchedBorder.LOWERED, new Color(255, 255, 255), new Color(160, 160, 160)), "Payment", TitledBorder.LEADING, TitledBorder.TOP, null, new Color(0, 0, 0)));
		panel_1.setBounds(452, 70, 371, 241);
		frame.getContentPane().add(panel_1);
		
		JLabel lblNewLabel_1_2_1 = new JLabel("Total Cost");
		lblNewLabel_1_2_1.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_2_1.setBounds(23, 24, 91, 33);
		panel_1.add(lblNewLabel_1_2_1);
		
		JLabel lblNewLabel_1_3 = new JLabel("Pay");
		lblNewLabel_1_3.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_3.setBounds(23, 81, 91, 33);
		panel_1.add(lblNewLabel_1_3);
		
		JLabel lblNewLabel_1_1_2 = new JLabel("Balance");
		lblNewLabel_1_1_2.setFont(new Font("Georgia", Font.BOLD, 15));
		lblNewLabel_1_1_2.setBounds(23, 141, 91, 33);
		panel_1.add(lblNewLabel_1_1_2);
		
		txtpay = new JTextField();
		txtpay.setColumns(10);
		txtpay.setBounds(143, 85, 177, 26);
		panel_1.add(txtpay);
		
		txtbalance = new JTextField();
		txtbalance.setColumns(10);
		txtbalance.setBounds(143, 145, 177, 26);
		panel_1.add(txtbalance);
		
		txttotalcost = new JTextField();
		txttotalcost.setColumns(10);
		txttotalcost.setBounds(143, 28, 177, 26);
		panel_1.add(txttotalcost);
		
		JScrollPane JTable = new JScrollPane();
		JTable.setBounds(24, 398, 787, 134);
		frame.getContentPane().add(JTable);
		
		table = new JTable();
		table.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				DefaultTableModel df = (DefaultTableModel)table.getModel();
				String bcode = df.getValueAt(table.getSelectedRow(), 0).toString();
				String bname = df.getValueAt(table.getSelectedRow(), 1).toString();
				String price = df.getValueAt(table.getSelectedRow(), 2).toString();
				String qty = df.getValueAt(table.getSelectedRow(), 3).toString();
				
				txtcode1.setText(bcode);
				txtbook.setText(bname);
				txtprice.setText(price);
				txtqty.setValue(0);
				txtcode1.requestFocus();
			}
		});
		table.setModel(new DefaultTableModel(
			new Object[][] {
			},
			new String[] {
				"Book Code", "Book Name", "Price", "Qty", "Total"
			}
		) {
			boolean[] columnEditables = new boolean[] {
				false, false, false, false, false
			};
			public boolean isCellEditable(int row, int column) {
				return columnEditables[column];
			}
		});
		JTable.setViewportView(table);
		
		
		JButton btnPrintInvoice = new JButton("Total");
		btnPrintInvoice.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				int pay = Integer.parseInt(txtpay.getText());
				int totalcost = Integer.parseInt(txttotalcost.getText());
				
				int bal = pay-totalcost;
				
				txtbalance.setText(String.valueOf(bal));
				
				sales();
			}
		});
		btnPrintInvoice.setBounds(606, 322, 180, 52);
		frame.getContentPane().add(btnPrintInvoice);
		
		JButton btnClear = new JButton("Clear");
		btnClear.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				txtcode1.setText("");
				txtbook.setText("");
				txtprice.setText("");
				txtqty.requestFocus();
				txttotalcost.setText("");
				txtpay.setText("");
				txtbalance.setText("");
			}
		});
		btnClear.setBounds(475, 322, 125, 52);
		frame.getContentPane().add(btnClear);
	}
}
