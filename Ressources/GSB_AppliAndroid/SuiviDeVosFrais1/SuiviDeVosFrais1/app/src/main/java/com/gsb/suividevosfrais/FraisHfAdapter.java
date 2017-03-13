package com.gsb.suividevosfrais;

import java.util.ArrayList;
import java.util.Locale;

import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.BaseAdapter;

public class FraisHfAdapter extends BaseAdapter {

	ArrayList<FraisHf> lesFrais ; // liste des frais du mois
	LayoutInflater inflater ;
	Integer key ;  // annee et mois (clé dans la liste)
	Context context ; // contexte pour gérer la sérialisation
	
	/**
	 * Constructeur de l'adapter pour valoriser les propriétés
	 * @param context
	 * @param lesFrais
	 * @param key
	 */
	public FraisHfAdapter(Context context, ArrayList<FraisHf> lesFrais, Integer key) {
		inflater = LayoutInflater.from(context) ;
		this.lesFrais = lesFrais ;
		this.key = key ;
		this.context = context ;
	}
	
	/**
	 * retourne le nombre d'éléments de la listview
	 */
	@Override
	public int getCount() {
		return lesFrais.size() ;
	}

	/**
	 * retourne l'item de la listview à un index précis
	 */
	@Override
	public Object getItem(int index) {
		return lesFrais.get(index) ;
	}

	/**
	 * retourne l'index de l'élément actuel
	 */
	@Override
	public long getItemId(int index) {
		return index;
	}

	/**
	 * structure contenant les éléments d'une ligne
	 */
	private class ViewHolder {
		TextView txtListJour ;
		TextView txtListMontant ;
		TextView txtListMotif ;
		ImageButton imgBtnClose;
	}

	
	/**
	 * Affichage dans la liste
	 */
	@Override
	public View getView(final int index, View convertView, ViewGroup parent) {
		ViewHolder holder ;

		if (convertView == null) {
			holder = new ViewHolder() ;

			convertView = inflater.inflate(R.layout.layout_liste, parent, false) ;
			holder.txtListJour = (TextView)convertView.findViewById(R.id.txtListJour) ;
			holder.txtListMontant = (TextView)convertView.findViewById(R.id.txtListMontant) ;
			holder.txtListMotif = (TextView)convertView.findViewById(R.id.txtListMotif) ;

			holder.imgBtnClose = (ImageButton) convertView.findViewById(R.id.imgBtn_close);
			convertView.setTag(holder) ;
		}else{
			holder = (ViewHolder)convertView.getTag();
		}

		holder.imgBtnClose.setOnClickListener(
				new OnClickListener() {
					@Override
					public void onClick(View v) {
						lesFrais.remove(index);
						Global.listFraisMois.get(key).supprFraisHf(index);
						Serializer.serialize(Global.filename, Global.listFraisMois, context);
						notifyDataSetChanged();
					}
				}
		);


		holder.txtListJour.setText(String.format(Locale.FRANCE, "%d", lesFrais.get(index).getJour())) ;
		holder.txtListMontant.setText(String.format(Locale.FRANCE, "%d", lesFrais.get(index).getMontant())) ;
		holder.txtListMotif.setText(lesFrais.get(index).getMotif()) ;
		return convertView ;
	}
	
}
